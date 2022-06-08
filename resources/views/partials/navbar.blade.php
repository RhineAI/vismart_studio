
  <section class="header fixed-top">
    <style>
      .clock {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translateX(-50%) translateY(-50%);
          color: #17D4FE;
          font-size: 60px;
          font-family: Orbitron;
          letter-spacing: 7px;
      }
  </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid mt-2">
          <a class="navbar-brand" href="/home">
            <img src="img/logo vismart studio.png " alt="" width="140" height="" class="d-inline-block">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>



          <div class="collapse navbar-collapse" id="navbarNav">
            <form class="nav-item w-50 mx-auto mt-5 mt-lg-0">
              <input class="form-control p-3" type="search" placeholder="Search..." aria-label="Search">
            </form>
            <ul class="navbar-nav">
              <li class="nav-item p-3 text-center">
                <a class="template-sosmed nav-link" href="/template">Template Social Media</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/portofolio"><button type="button" class="btn-border-secondary btn p-3 w-100">Portofolio Client</button></a>
              </li>
              @auth       
              <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a class="nav-link"><button type="sumbit" class="btn-primary btn p-3 w-100">Logout Account</button></a>
                </form>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="/login"><button type="button" class="btn-primary btn p-3 w-100">Login Account</button></a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>

  <script>
      function showTime(){
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      var session = "AM";
        
        if(h == 0){
            h = 12;
        }
        
        if(h > 12){
            h = h - 12;
            session = "PM";
        }
        
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        
        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        
        setTimeout(showTime, 1000);
        
    }

    showTime();
  </script>


  </section>
    