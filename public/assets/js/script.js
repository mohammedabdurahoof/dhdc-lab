

function openAddForm() {
    document.getElementById("openAddForm").hidden = false;
}

function closeForm() {
    document.getElementById("openAddForm").hidden = true;
}

function openImport() {
    document.getElementById("importForm").hidden = false;
}

function closeImport() {
    document.getElementById("importForm").hidden = true;
}

function editCall(student) {
    $.ajax({
        url: `edit/${student.id}`,
        success: function (result) {
            openAddForm();
            $("#name").val(result.name);
            $("#adno").val(result.adno);
            $("#class").val(result.class);
            $('#addForm').attr('action', `/update/${result.id}`);
            // console.log(result);
        },
    });
}


function getDetiles(){
    var adno = document.getElementById("adno").value;
    console.log(adno)
    $.ajax({
        url: `getStudent/${adno}`,
        success: function (result) {
            $("#name").val(result[0].name);
            $("#class").val(result[0].class);
            // console.log(result[0].name);
        },
    });
}


// stationery

