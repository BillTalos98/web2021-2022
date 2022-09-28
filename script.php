// get selected row
 // display selected row data in text input
var table = document.getElementById("table"),rIndex;

for(var i = 1; i < table.rows.length; i++){
    table.rows[i].onclick = function(){
        rIndex = this.rowIndex;
        console.log(rIndex);

        document.getElementById("id").value = this.cells[0].innerHTML;
        document.getElementById("p_name").value = this.cells[1].innerHTML;
        document.getElementById("address").value = this.cells[2].innerHTML;
        document.getElementById("types").value = this.cells[3].innerHTML;
        document.getElementById("lat").value = this.cells[4].innerHTML;
        document.getElementById("lng").value = this.cells[5].innerHTML;
        document.getElementById("rating").value = this.cells[6].innerHTML;
        document.getElementById("rating_n").value = this.cells[7].innerHTML;
        document.getElementById("cur_popularity").value = this.cells[8].innerHTML;
    };
}


// edit the row
function editRow(){
    table.rows[rIndex].cells[0].innerHTML = document.getElementById("id").value;
    table.rows[rIndex].cells[1].innerHTML = document.getElementById("p_name").value;
    table.rows[rIndex].cells[2].innerHTML = document.getElementById("address").value;
    table.rows[rIndex].cells[3].innerHTML = document.getElementById("types").value;
    table.rows[rIndex].cells[4].innerHTML = document.getElementById("lat").value;
    table.rows[rIndex].cells[5].innerHTML = document.getElementById("lng").value;
    table.rows[rIndex].cells[6].innerHTML = document.getElementById("rating").value;
    table.rows[rIndex].cells[7].innerHTML = document.getElementById("rating_n").value;
    table.rows[rIndex].cells[8].innerHTML = document.getElementById("cur_popularity").value;
}

// Data Update Table Here
function editTableDisplay(){
    document.querySelector('.editTable').setAttribute('style', 'display: block;')
}
