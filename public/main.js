$(document).ready(function() {
    // Select2 Multiple
    $('.select2-multiple').select2({
    //   placeholder: "Select",
    //   allowClear: true,
    //   minimumInputLength: 3, // only start searching when the user has input 3 or more characters
        multiple: true,
    //   width: '50%' // need to override the changed default
        closeOnSelect: false,
    //   theme: "classic"
    });

});

function selectAll() {
        $(".select2-multiple > option").prop("selected", true);
        $(".select2-multiple").trigger("change");
}

function deselectAll() {
    $(".select2-multiple > option").prop("selected", false);
    $(".select2-multiple").trigger("change");
}

var togglePermissionModal = (id) => {
    $.ajax({
        url : `/permissions-by-role/${id}`,
        type : 'GET',
        success : response => {
            if(response?.permissions){
                $('#permissionModal').modal('show')
                $("#permission-list").html(``)
                response.permissions.forEach(permission => {
                    $("#permission-list").append(`
                        <li class="list-group-item col-6">${permission}</li>
                    `)
                });
            }
            
        },
        error : response => {
            console.log(response)
        }
    })
}

var openItemDetailsModal = (id) => {
    $.ajax({
        url : `/item-details/${id}`,
        type : 'GET',
        success : response => {
            const data = response.data
            if(JSON.stringify(data) !== '{}'){
                
                $('#itemDetailsModal').modal('show')
                $("#itemDetails").html(``)
                // for(const key in data)
                // {
                    
                // }
                $("#itemDetails").append(`
                    <li class="list-group-item"><strong>1. System Model - </strong>${data['system_model']} </li>
                    <li class="list-group-item"><strong>2. Processor - </strong>${data['cpu']} </li>
                    <li class="list-group-item"><strong>3. Generation - </strong>${data['generation']} </li>
                    <li class="list-group-item"><strong>4. Memory - </strong>${data['primary_memory']} </li>
                    <li class="list-group-item"><strong>5. Hard Disk - </strong>${data['secondary_memory']} </li>
                    <li class="list-group-item"><strong>6. DVD Drive - </strong>${data['is_dvd'] == '1' ? 'YES' : 'NO'} </li>
                    <li class="list-group-item"><strong>7. USB - </strong>${data['usb']} Port</li>
                    <li class="list-group-item"><strong>8. HDMI - </strong>${data['is_hdmi'] == '1' ? 'YES' : 'NO'} </li>
                    <li class="list-group-item"><strong>9. Network - </strong>${data['is_network'] == '1' ? 'YES' : 'NO'} </li>


                `)
            }

            if(response?.message){
                $('#itemDetailsModal').modal('show')
                $("#itemDetails").html(``)
                $("#itemDetails").append(`${response.message}`)
            }
            
        },
        error : response => {
            console.log(response)
        }
    })
}

$("#computer-btn").on('change', function() {
    let togBtn = $(this);
    togBtn.val(togBtn.prop('checked'));
    if(togBtn.val() == 'true'){
        $(".is_computer").val(1);
        $(".computer-details").addClass('d-block')
        $(".computer-details").removeClass('d-none')
    }
    else{
        $(".is_computer").val(0);
        $(".computer-details").addClass('d-none')
        $(".computer-details").removeClass('d-block')    
    }
})

const handleToggleDeleteConfirm = (url) => {
    $('.delete-btn').attr('href',url)
    $("#handleDeleteConfirmModal").show()
}

const cancelDeleteModal = () => {
    $("#handleDeleteConfirmModal").hide()
}


$('.report-filter').on('change',(e) => {
    let departmentId = e.target.value

    $('#reportfilter').submit()
})


$("#code_search").on('keydown', (e) => {
    if(e.keycode == '13'){
        $("#item-search").submit()
    }
})

$("#department_name_search").on('change', (e) => {
    $("#item-search").submit()
})

$("#brand_name_search").on('change', (e) => {
    $("#item-search").submit()
})

$("#category_name_search").on('change', (e) => {
    $("#item-search").submit()
})

