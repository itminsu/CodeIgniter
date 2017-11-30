$(document).ready(function()
{
  //use datatables that is table plug-in for jQuery
  $('#table_id').DataTable();
});

function add_customer()
{
  var firstName = $("#first_name").val();
  var lastName = $("#last_name").val();

  if(firstName != null && firstName != "" && lastName != null && lastName != "")
  {
    $("#spinner").removeClass("hidden");
    $.ajax({
      url: "http://minsulee.ca/CodeIgniter/stores/customer_add",
      type: "POST",
      data: $('#form_add').serialize(),
      dataType: "text",
      success: function(data)
      {
        $("#spinner").addClass("hidden");
        window.location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert("Error adding Data")
      }
    });
  }
  else
  {
      alert("Last Name and First Name are required.");
  }
}
//load customer data to modal
function update_customer(id)
 {
  $.ajax({
    url: "http://minsulee.ca/CodeIgniter/stores/load_customer_to_edit/"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $("#modal_customer_id").val(data.customer_id);
      $("#modal_first_name").val(data.first_name);
      $("#modal_last_name").val(data.last_name);
      $("#modal_active").val(data.active);

      $('#modal_form').modal('show');
    },
    error: function(jqXHR, textStatus, errorThrown)
    {
      alert("Error, Updating Data");
    }

  });
}

function save()
{
  var firstName = $("#modal_first_name").val();
  var lastName = $("#modal_last_name").val();

  if(firstName != null && firstName != "" && lastName != null && lastName != "")
  {
    $("#spinner").removeClass("hidden");
    $.ajax({

      url: "http://minsulee.ca/CodeIgniter/stores/customer_update",
      type: "POST",
      data: $('#form_update').serialize(),
      dataType: "JSON",
      success: function(data)
      {
        $('#modal_form').modal('hide');
        $("#spinner").addClass("hidden");
        window.location.reload();
      },
      error: function (jqXHR,textStatus,errorThrown)
      {
        alert("Error updating Data")
      }

    });
  }
  else
  {
      alert("Last Name and First Name are required.");
  }
}

//Delete dialog
function show_delete_dialog(id){
    $("#delete-dialog").dialog({
        show: {effect: "fade", speed: 1000},
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Delete": function() {
                delete_customer(id);
                $(this).dialog("close");
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        }
    });
    $("#delete-dialog").dialog("open");
}

function delete_customer(id)
{
  $("#spinner").removeClass("hidden");
  $.ajax({
    url: "http://minsulee.ca/CodeIgniter/stores/customer_delete/"+id,
    type:"POST",
    dataType: "JSON",
    success: function(data)
    {
      $("#spinner").addClass("hidden");
      window.location.reload();
    },
    error: function(jqXHR, textStatus, errorThrown)
    {
      alert("Error, Deleting Data");
    }
  });
}

function show_title_list(id)
{
  $.ajax({
    url: "http://minsulee.ca/CodeIgniter/stores/get_title_list/"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $("#title_list").html(""); //initialize modal data
      if(data.length < 1)
      {
        $("#title_list").append("No Films Checked Out");
      }
      else {
        //Lodash.js
        //used _.times() instead for loop
        _.times(data.length, function(key){
          var title = `<li>`+`${data[key].title}`+`</li>`;
          $("#title_list").append(title);
        });
      }
      $('#modal_title').modal('show');
    },
    error: function(jqXHR, textStatus, errorThrown)
    {
      alert("Error, get titles");
    }
  });
}
