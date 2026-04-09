document.addEventListener("DOMContentLoaded", function () {
  fetch("reterivedatacards.php")
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("totalUsers").innerHTML = data.users;
      document.getElementById("totalRequests").innerHTML = data.requests;
      document.getElementById("highSeverity").innerHTML = data.severity;
      document.getElementById("districts").innerHTML = data.districts;
    });

  fetch("getRequests.php")
    .then((response) => response.json())
    .then((data) => {
      const table = document.getElementById("requesttable");
      table.innerHTML = "";

      data.forEach((row) => {
        console.log(row);
        table.innerHTML += `

<tr>
  <td>${row.ReliefID}</td>
  <td>${row.UserName}</td>
  <td>${row.TypeofRelief}</td>
  <td>${row.District}</td>
  <td>${row.FloodSeverityLevel}</td>
  <td>${row.NoOfFamilyMembers}</td>
  <td>${row.date}</td>
</tr>
`;
      });
    });
});
