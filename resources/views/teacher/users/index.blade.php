@extends('layouts.master')

@section('section-title')
ITerview
@endsection

@section('content')

<!-- Delete Modal Component -->

@component('teacher.helpers.modal')
    @slot('title')
        Supprimer l'utilisateur
    @endslot
    
    @slot('modalId')
        delete-modal
    @endslot

    @slot('formId')
        delete-form
    @endslot

    @slot('method')
        DELETE
    @endslot

    @slot('content')
    Voulez-vous vraiment supprimer cet utilisateur !
    @endslot

    @slot('cancel')
    Annuler
    @endslot

    @slot('confirm')
    Oui, supprimer
    @endslot
    @slot('submitId')
    deleteBtn
    @endslot
@endcomponent


<!-- Edit Modal Component -->

@component('teacher.helpers.modal')
    @slot('title')
    Modifier l'utilisateur
    @endslot

    @slot('modalId')
    edit-modal
    @endslot

    @slot('formId')
    edit-form
    @endslot

    @slot('method')
    PUT
    @endslot

    @slot('content')
      <div class="form-group">
        <label>Nom et prénom</label>
        <input type="text" name="name" value="" class="form-control" id="name">
        <span class="text-danger">
        <strong id="name-error"></strong>
    </span>
      </div>
      
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="" class="form-control" id="email">
        <span class="text-danger">
        <strong id="email-error"></strong>
    </span>
        
      </div>
      
      <div class="form-group">
        <label>Le role</label>
        <select name="usertype" class="form-control" id="role">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>
    @endslot

    @slot('cancel')
        Annuler
    @endslot

    @slot('confirm')
        Modifier
    @endslot

    @slot('submitId')
      editBtn
    @endslot

@endcomponent


<div class="card">
  <!-- Card header -->
  <div class="card-header border-0">
    <h3 class="mb-0">La liste des utilisateurs</h3>
  </div>
  <!-- Light table -->
  <div class="table-responsive">
    <table class="table align-items-center " id="myTable">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="sort">Nom et prénom</th>
          <th scope="col" class="sort">Email</th>
          <th scope="col">Le role</th>
          <th scope="col" class="sort">Les actions</th>
        </tr>
      </thead>
      <tbody class="list">
        {{-- Magic happens here ssi l7aj ! no data !! but there is ! thanks to ajax ;-) --}}
      </tbody>
    </table>
  </div>
</div>

@endsection

@section('scripts')

{{-- import iterview utilities --}}
<script src="{{ asset('js/iterview.js') }}"></script>

<script>
/* Show the modal */
$(document).ready(function() {

  const table = handleUsersLoad();
  handleUsersDelete();
  handleUsersEdit();

  function handleUsersLoad() {
    // Datatables config
    const table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "lengthMenu": "Afficher _MENU_ éléments",
            "sInfo":"Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "zeroRecords": "Aucun utilisateurs",
            "search": "Rechercher",
            "oPaginate": {
                "sNext":     "Suivant",
                "sPrevious": "Précédent"
    },
        },
        ajax: '{!! route('ajax.users') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'role' },
            { data: 'actions', name: 'actions' }
        ]
    });

    return table;
  }

  function handleUsersDelete() {
    // DELETE A USER
    $('#myTable tbody').on('click', 'button.delete', function() {
      // get user id
      const userId = $(this).data('id');

      // set action
      $('#delete-form').attr('action', '/users/' + userId)

      // show the modal
      $('#delete-modal').modal('show');
    });
  }

  function handleUsersEdit() {
    // EDIT A USER
    $('#myTable tbody').on('click', 'button.edit', function() {
        // get user id
        const userId = $(this).data('id');

        // set action
        $('#edit-form').attr('action', '{{url("/users")}}'+ "/" + userId);

        // fill inputs with data
        const name = $(this).parents().eq(2).siblings('td')[0].innerText;
        const email = $(this).parents().eq(2).siblings('td')[1].innerText;
        const role = $(this).parents().eq(2).siblings('td')[2].innerText;

        $('#name').val(name);
        $('#email').val(email);
        $( '#name-error' ).html( "" );
        $( '#email-error' ).html( "" );

        $('#role').get(0).selectedIndex = (role === 'admin' ? 1 : 0)

        // show the modal
        $('#edit-modal').modal('show');

        $('#edit-form').unbind('submit').submit(function (e) {
            // turn button into loading state
            iterview.handleButtonLoading(true, '#editBtn');

            const urlForm = $(this).attr('action');
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: urlForm,
                method: 'POST',
                data: {
                    name: jQuery('#name').val(),
                    email: jQuery('#email').val(),
                    usertype: jQuery('#role').val(),
                    _method: 'PUT',
                },
                success: function (result) {
                    // turn button into default state
                    iterview.handleButtonLoading(false, '#editBtn');

                    if (result.errors) {
                        if (result.errors.name && result.errors.email) {
                            $('#edit-form').find('#name-error').html(result.errors.name[0]);
                        } else if (result.errors.email) {
                            $('#edit-form').find('#email-error').html(result.errors.email[0]);
                        } else {
                            $('#edit-form').find('#name-error').html(result.errors.name[0]);
                        }
                    } else {
                        iterview.handleSuccessResponse(table, result, '#edit-modal');
                    }
                }
            });
        })
      });
  }

});

</script>

@endsection