const weapons = document.getElementById("weapons");

if(weapons) {
    weapons.addEventListener("click", (e) => {
       if(e.target.className === "btn btn-danger delete-weapon") {
        if(confirm("Dit wapen zal permanent verwijderd worden.\n\nWeet je zeker dat je het wil verwijderen?")) {
            const id= e.target.getAttribute("data-id");

            fetch(`/weapon/delete/${id}` , {
                method: "DELETE"
            }).then(res => window.location.reload());
            
        }
       }
    })
}