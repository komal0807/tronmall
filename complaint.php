<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .app
        {
        display: flex;
        justify-content: center;
        min-height: 100vh;
        width: 100vw;
        }
        .main
        {
            background-color: #f1f1f1;
            border: 1px solid #000;
            height: -webkit-fit-content;
            height: -moz-fit-content;
            height: fit-content;
            max-width: 420px;
            min-height: 100vh;
            position: absolute;
            width: 100vw;
            margin: auto;
        }
    </style>
  </head>
  <body>
    <div class="app">
    <div class="main">
        <nav class="navbar bg-success">
            <div class="container-fluid justify-content-start">
              <button class="btn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg></button>
              <span class="navbar-brand text-white">Add Complaints</span>
            </div>
          </nav>
        <div class="container mt-4">
          <form>
            <label class="form-label ms-1" for="select">Type</label>
            <select class="form-select mb-3" id="select" aria-label="Default select example">
              <option selected>Choose type of complain</option>
              <option value="1">Suggestion</option>
              <option value="2">Consult</option>
              <option value="3">Recharge Problem</option>
              <option value="4">Withdraw Problem</option>
              <option value="5">Parity Problem</option>
              <option value="6">Gift Receive Problem</option>
              <option value="7">Other</option>
          </select>
          <label class="form-label ms-1 mt-4" for="Reference">Out Id (Reference ID)</label>
          <input type="text" class="form-control " id="Reference">
          <label class="form-label ms-1 mt-4" for="Whatsapp">Whatsapp</label>
          <input type="text" class="form-control " id="Whatsapp">
          <label class="form-label ms-1 mt-4" for="floatingTextarea2">Description</label>
          <textarea class="form-control" placeholder="Description of complain" id="floatingTextarea2" style="height: 100px"></textarea>
          
            <div class="fs-6 mt-4 w-75 mx-auto text-center">Service: 10:00~17:00, Mon~Fri about 1~5 business day</div>
            <button type="submit" class="btn btn-sm btn-primary mt-4 d-block mx-auto">Continue</button>
          </form>
         
        </div>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  
</html>