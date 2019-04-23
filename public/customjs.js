function insertRow()
{
    var table = document.getElementById("entry");
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = '<input type="text" class="form-control entry1">';
    cell2.innerHTML = '<input type="text" class="form-control entry2">';
    cell3.innerHTML = '<input type="text" class="form-control entry3">';

}

function deleteRow()
{
    var table = document.getElementById("entry");
    var rowCount = table.rows.length;
    if(rowCount > 1)
    {
    rowCount = rowCount - 1;
    table.deleteRow(rowCount);
    }

}

function MyClass(x,y,z)
{
    this.var1 = x;
    this.var2 = y;
    this.var3 = z;
}

function Submit()
{
    var value1 = document.getElementsByClassName('entry1');
    var value2 = document.getElementsByClassName('entry2');
    var value3 = document.getElementsByClassName('entry3');

    var myArray = [];

    for( i = 0; i <value1.length; i++)
    {
        var entry = new MyClass(value1[i].value,value2[i].value,value3[i].value);
        myArray.push(entry);
    }

    var z = JSON.stringify(myArray);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });


    $.ajax({
        url:"/insertValue",
        method: 'post',
        data:{req:z},
        success:function(result)
        {
            $('#response').html(result);
            $('#response').fadeIn();
            setTimeout(function(){$('#response').fadeOut();},4000);
        }

    });


}
