<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
               
                <h1 class="search">MUST KEYS MANAGEMENT SYSTEM</h1>
                <div class="user">
                    <a href="#" id="openModalBtn" class="btn">Add New</a>

                   
                    <div class="img-case">
                        <img src="image/must.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>2194</h1>
                        <h3>Staff</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>53</h1>
                        <h3>Keys</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Assets</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/schools.png" alt="">
                    </div>
                </div>
                
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Staff list:</h2>
                        <a href="view_keys.php" class="btn">View all Staffs took keys</a>
                    </div>
                    <table>
                        <tr>
                            <th>Staff Name</th>
                            <th>Phone number</th>
                    
                        </tr>
                        <tr>
                            <td>Paul Kilo</td>
                            <td>07789782</td>
                          
                        </tr>
                        <tr>
                            <td>Beth Singano</td>
                            <td>09456203</td>
                      
                        </tr>
                        <tr>
                            <td>Joyce kulwa</td>
                            <td>09610987</td>
                      
                        </tr>
                        <tr>
                            <td>Salum Kim</td>
                            <td>07234678</td>
                          
                        </tr>
                        <tr>
                            <td>Subiri Mateso</td>
                            <td>78904106</td>
                     
                        </tr>
                        <tr>
                            <td>John Sanga</td>
                            <td>08765120</td>
                    
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal Structure -->
<div id="entryModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Add Key Entry</h2>
    <form id="addKeyForm" action="add_key.php" method="POST">
      <label for="staffName">Staff Name:</label>
      <input type="text" id="staffName" name="staff_name" required>

      <label for="keyName">Key Name:</label>
      <input type="text" id="keyName" name="key_name" required>

      <label for="dateTaken">Date Taken:</label>
      <input type="datetime-local" id="dateTaken" name="time_taken" required>

      <label for="returnTime">Return Time:</label>
      <input type="datetime-local" id="returnTime" name="return_time" required>

      <br>
      <button type="submit" class="btn">Submit</button>
    </form>
  </div>
</div>

        


<script>
  const modal = document.getElementById("entryModal");
  const openBtn = document.getElementById("openModalBtn");
  const closeBtn = document.querySelector(".modal .close");

  openBtn.onclick = function (e) {
    e.preventDefault();
    modal.style.display = "block";
  }

  closeBtn.onclick = function () {
    modal.style.display = "none";
  }

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  document.getElementById("entryForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('submit_entry.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.text())
    .then(data => {
      alert(data); 
      modal.style.display = "none";
      document.getElementById("entryForm").reset();
    })
    .catch(err => {
      alert("Submission failed");
      console.error(err);
    });
  });
</script>
</body>

</html>