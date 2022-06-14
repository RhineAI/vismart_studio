<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\DetailService;
use App\Models\Jasa;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetailServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all()->pluck('id', 'title');
        $detail_service = DetailService::all();
        return view('layanan/detail_layanan/index', compact('service','detail_service'));
    }

    public function data()
    {
        $service = DetailService::
        leftJoin('service', 'service.id', 'detail_service.service_id')
        ->select('detail_service.*', 'title')
        ->orderBy('id', 'desc')->get();


        return datatables()
            ->of($service)
            ->addIndexColumn()
            // ->addColumn('layanan', function ($service) {
            //     return $service->service_id;
            //     // $serv = $service->service_id ;
            // })

            ->addColumn('jasa', function ($service) {
                $jasa_layanan = '';
                foreach ($service->jasa as $key => $value) {
                    $jasa_layanan .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-primary rounded">'. $value->title.'</div>';
                }
                return $jasa_layanan;
            })

            ->addColumn('keuntungan', function ($service) {
                $advantages = '';
                foreach ($service->advantage as $key => $value) {
                    $advantages .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-warning rounded">'. $value->advantage.'</div>';
                }
                return $advantages;
            })

            ->addColumn('paket', function ($service) {
                $package = '';
                foreach ($service->package as $key => $value) {
                    if ($value->is_first == 1){
                        $package .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-danger rounded">'. $value->name.'</div>';
                    } else {
                        $package .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-warning rounded">'. $value->name.'</div>';
                    }
                }
                return $package;
            })

            ->addColumn('created', function($service) {
                return tanggal($service->created_at);
            })
            ->addColumn('action', function ($service) {
                return '
                    <a href="'. route('detail_layanan.edit', $service->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('detail_service.hapus', $service->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                ';
            })
            ->rawColumns(['jasa','keuntungan','paket','action'])
            ->make(true);
    }
    // <a href="'. route('detail_layanan.edit', $service->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan/detail_layanan/create', [
            'service' => Service::all(),
            'advantage' => Advantage::all(),
            'jasa' => Jasa::all(),
            'package' => Package::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return($request->all());

        $validate = $request->validate([
            'question' => 'required|max:225',
            'image' => 'image|file|required|max:12000',
            'answer' => 'required',
            'reason' => 'required|max:225',
            // 'description' => 'required|max:2500'
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('detail_service');
        }

        $question = $request['question'];
        $answer = $request['answer'];
        $reason = $request['reason'];

        $service = new DetailService();
        $service->service_id = $request->service;
        $service->question = $question;
        $service->image = $validate['image'];
        $service->answer = $answer;
        $service->reason = $reason;
        $service->save();
        
        
        // $service->service()->attach($request->service);
        $service->jasa()->attach($request->jasa);
        $service->advantage()->attach($request->advantage);
        $service->package()->attach($request->package);
        
        
        // dd($service);

        return redirect('/dashboard/layanan/detail_layanan')->with('success', 'Berhasil Ditambahkan');


        // $service->service()->attach($request->service);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function show(DetailService $detailService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('layanan/detail_layanan/edit', [
            // 'id' => $id,
            'detail' => DetailService::with(['jasa', 'package', 'advantage'])->findOrFail($id),
            'package' => Package::orderBy('name', 'ASC')->get(),
            'jasa' => Jasa::orderBy('title', 'ASC')->get(),
            'services' => Service::all(),
            'advantage' => Advantage::orderBy('advantage', 'ASC')->get(),
        ]);
    }

    public function ubah($id)
    {
        $detail = DetailService::findOrFail($id);

        dd($detail);

        // return view('layanan/detail_layanan/edit', [
        //     'detail_id' => $id,
        //     'layanan' => $detail,
        //     'services' => Service::all(),
        //     'jasa' => Jasa::orderBy('title', 'ASC')->get(),
        //     'advantage' => Advantage::orderBy('advantage', 'ASC')->get(),
            // 'package' => Package::orderBy('name', 'ASC')->get(),
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = $request->validate([
            'question' => 'required|max:225',
            'image' => 'image|file|max:12000',
            'answer' => '',
            'reason' => 'max:225',
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $rules['image'] = $request->file('image')->store('detail_service');
        }

        $question = $request['question'];
        $answer = $request['answer'];
        $reason = $request['reason'];

        $service = DetailService::find($id);
        $service->service_id = $request->service;
        $service->question = $question;
        // $service->image = $rules['image'];
        $service->answer = $answer; 
        $service->reason = $reason;
        $service->update();

        $service->jasa()->sync($request->jasa);
        $service->advantage()->sync($request->advantage);
        $service->package()->sync($request->package);

        return redirect('/dashboard/layanan/detail_layanan')->with('success', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailService $detailService)
    {
        $detail = $detailService->id;
        // return $detail;
        DetailService::destroy($detail);
        // $detail->delete();
        return response(null,200);
    }

    public function hapus($id)
    {
        $hapus = DetailService::find($id);
        $hapus->delete();   

        return response(null,200);
    }
}
