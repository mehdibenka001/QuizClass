@extends('layouts.master')

@section('section-title')
ITerview
@endsection

@section('content')
@component('teacher.helpers.modal')
    @slot('title')
        Delete alert
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
    Voulez-vous vraiment supprimer ce question
    @endslot

    @slot('cancel')
    Cancel
    @endslot

    @slot('confirm')
    Yes, delete
    @endslot

    @slot('submitId')
      deleteBtn
    @endslot
@endcomponent


<!-- Edit Modal Component -->

@component('teacher.helpers.modal')
    @slot('title')
    Edit Section
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
        <label>Label</label>
        <input type="text" name="label" value="" class="form-control" id="edit-label">
        <span class="text-danger">
            <strong id="edit-label-error"></strong>
        </span>
      </div>
      <div class="form-group">
        <label>Topic</label>
        <select class="browser-default custom-select" name="edit-topic" id="edit-topic">
        @foreach($topics as $topic )
        <option value="{{$topic->id}}">{{$topic->label}}</option>
        @endforeach
        </select>
      </div>
    @endslot

    @slot('cancel')
        Cancel
    @endslot

    @slot('confirm')
        Update
    @endslot

    @slot('submitId')
      editBtn
    @endslot

@endcomponent

<!-- ADD Modal Component -->


<!-- Type 1 -->
@component('teacher.helpers.modal')
    @slot('title')
    Ajouter une question du premier type
    @endslot

    @slot('modalId')
    add-modal-1
    @endslot

    @slot('formId')
    add-form-1
    @endslot

    @slot('method')
    POST
    @endslot

    @slot('content')
      <div class="form-group">
          <label>La question</label>
          <input type="text" name="add-question-1" value="" class="form-control" id="add-question-1">
          <span class="text-danger">
              <strong id="add-question-error-1"></strong>
          </span>
      </div>

      

      <div class="form-group">
          <label for="code">Entrer le code <small>(optionnel)</small></label>
          <textarea class="form-control" id="code-1" rows="3" name="code-1"></textarea>
      </div>
      <div class="form-group" id="answers">
          <label>Les réponses <small>(cocher la bonne réponse)</small></label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
          <br />
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
          <br />
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
          <br />
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
      <span class="text-danger">
                <strong id="add-answer-error-1"></strong>
      </span>
      </div>

    @endslot

    @slot('cancel')
        Annuler
    @endslot

    @slot('confirm')
        Ajouter
    @endslot

    @slot('submitId')
      addBtn
    @endslot

@endcomponent

<!-- type 2 -->

@component('teacher.helpers.modal')
    @slot('title')
    Ajouter une question du deuxiéme type
    @endslot

    @slot('modalId')
    add-modal-2
    @endslot

    @slot('formId')
    add-form-2
    @endslot

    @slot('method')
    POST
    @endslot

    @slot('content')
      <div class="form-group">
          <label>La question</label>
          <input type="text" name="add-question-2" value="" class="form-control" id="add-question-2">
          <span class="text-danger">
              <strong id="add-question-error-2"></strong>
          </span>
      </div>

      <div class="form-group">
       <label>L'image</label>
       <input type="file" name="image" class="question-img" id="add-image">
        <span class="text-danger">
              <strong id="add-image-error"></strong>
        </span>
      </div>

      <div class="form-group" id="answers-2">
          <label>Les réponses <small>(cocher la bonne réponse)</small></label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer-2">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
          <br />
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer-2">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
          <br />
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer-2">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
          <br />
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <input type="checkbox" name="answer-2">
                  </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" required>
          </div>
      <span class="text-danger">
                <strong id="add-answer-error-2"></strong>
      </span>
      </div>

    @endslot

    @slot('cancel')
        Annuler
    @endslot

    @slot('confirm')
        Ajouter
    @endslot

    @slot('submitId')
      addBtn-2
    @endslot

@endcomponent


<!-- type 3 -->

@component('teacher.helpers.modal')
    @slot('title')
    Ajouter une question du troisiéme type
    @endslot

    @slot('modalId')
    add-modal-3
    @endslot

    @slot('formId')
    add-form-3
    @endslot

    @slot('method')
    POST
    @endslot

    @slot('content')
      <div class="form-group">
          <label>La question</label>
          <input type="text" name="add-question-3" value="" class="form-control" id="add-question-3">
          <span class="text-danger">
              <strong id="add-question-error-3"></strong>
          </span>
      </div>
      <div class="form-group">
          <label for="code-3">Entrer le code <small>(optionnel)</small></label>
          <textarea class="form-control" id="code-3" rows="3" name="code-3"></textarea>
      </div>

      <div class="form-group" id="answers-3">
          <label>La réponse</label>
          <div class="input-group">
              <input type="text" class="form-control" aria-label="Text input with radio button" id="answer-3" required>
          </div>
      <span class="text-danger">
                <strong id="add-answer-error-3"></strong>
      </span>
      </div>

    @endslot

    @slot('cancel')
        Annuler
    @endslot

    @slot('confirm')
        Ajouter
    @endslot

    @slot('submitId')
      addBtn-3
    @endslot

@endcomponent





<div class="modal fade" id="question-type">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Le Type de la question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {{-- Topic and Section of the question --}}
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Le sujet</label>
            <select class="browser-default custom-select" name="add-topic-1" id="add-topic-1" required>
                <option selected disabled value="">Choisissez un sujet</option>
                @foreach($topics as $topic )
                <option value="{{$topic->id}}">{{$topic->label}}</option>
                @endforeach
            </select>
  
            <span class="text-danger">
                <strong id="add-topic-error-1"></strong>
            </span>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
              <label>L'element</label>
              <select class="browser-default custom-select" name="add-section-1" id="add-section-1" required>
                  <option selected disabled>Choisissez un élement</option>
              </select>
              <span class="text-danger">
                <strong id="add-section-error-1"></strong>
            </span>
          </div>
        </div>
      </div>


       <div class="form-group">
       <label>Type</label>
       <select class="browser-default custom-select" name="add-type" id="add-type" required>
        <option selected disabled value="">Choisissez Le type de la question</option>
        <option value="1">La question avec code</option>
        <option value="2">La question avec image</option>
        <option value="3">Guess the output</option>
      </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="step_1" data-topic="">Suivant</button>
      </div>
    </div>
  </div>
</div>



<div class="card">
  <!-- Card header -->
  <div class="card-header border-0">
    <h3 class="mb-0">La list des questions</h3>
    <button class="btn btn-primary float-right add">Ajouter une question</button>
  </div>
  <!-- Light table -->
  <div class="table-responsive">
    <table class="table align-items-center table-flush" id="questionsTable">
      <thead class="thead-light">
        <tr>
          <th scope="col">La question</th>
          <th scope="col">Le type</th>
          <th scope="col">Le sujet</th>
          <th scope="col">L'element</th>
          <th scope="col">Les actions</th>
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

$(document).ready(function() {
  // init dropify
  $('.question-img').dropify();

  const myTextArea = document.getElementById("code-1");
  const myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
            mode: "javascript",
            theme: "material-darker",
            lineNumbers: true,
            indentUnit: 4
        });
  const textArea= document.getElementById("code-3");
  const codeMirror=CodeMirror.fromTextArea(textArea,{
    mode: "javascript",
            theme: "material-darker",
            lineNumbers: true,
            indentUnit: 4
  });
  const table = handleQuestionsLoad();

  handleQuestionsDelete();

  handleQuestionsEdit();

  handleQuestionsAdd();

  function handleQuestionsLoad() {
      const table = $('#questionsTable').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "lengthMenu": "Afficher _MENU_ éléments",
            "sInfo":"Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "zeroRecords": "Aucune question",
            "search": "Rechercher",
            "oPaginate": {
                "sNext":     "Suivant",
                "sPrevious": "Précédent"
    },
        },
        ajax: {
          url: "{{route('ajax.questions')}}",
          type:'GET',
          data: function (d) {
          d.search=(".dataTables_filter input[type=search]").value;
          d.section_id = get('section_id');
          }

        },
        columns: [
            { data: 'question', name: 'question'},
            { data: 'type', name: 'type'},
            { data: 'section', name: 'section' },
            { data: 'topic', name: 'topic'},
            { data: 'actions', name: 'actions' }
        ]
    });

    return table

  }

  function handleQuestionsDelete() {
    // DELETE A Topic
    $('#questionsTable tbody').on('click', 'button.delete', function() {
      // get topic id
      const questionId = $(this).data('id');

      // set action
      $('#delete-form').attr('action', '{{url("/questions")}}'+"/" + questionId);

      // show the modal
      $('#delete-modal').modal('show');
    });
  }

  function handleQuestionsEdit() {
    // EDIT A topic
    $('#questionsTable tbody').on('click', 'button.edit', function() {
      // get topic id
      const questionId = $(this).data('id');
      const questionType = $(this).data('type');

      // set action
      $('#edit-form').attr('action', '{{url("/sections")}}'+"/"+ questionId);

      // reset selected option for each clicon edit
      $('#edit-topic > option').each(function(){
        $(this).attr('selected', false);
      });

      // fill inputs with data
      const label = $(this).parent().siblings('td').first()[0].innerText;
      const topic = $(this).parent().siblings('td')[1].innerText;

      $('#edit-label').val(label);
      $( '#edit-label-error' ).html( "" );
      $( '#edit-image-error' ).html( "" );

      // selected option for topic
      $('#edit-topic > option').each(function(){
        if($(this).text()==topic){
          $(this).attr('selected', true);
        }
      });

      // show the modal
      $('#edit-modal').modal('show');

      $('#edit-form').unbind('submit').submit(function(e){
        // turn button into loading state
        iterview.handleButtonLoading(true, '#editBtn');

        const urlForm= $(this).attr('action');
        e.preventDefault();
        $( '#edit-label-error' ).html( "" );
        $( '#edit-image-error' ).html( "" );
        $.ajax({    
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: urlForm,
          method: 'POST',
          data: {
            label : $('#edit-label').val(),
            topic:$('#edit-topic').val(),
            _method:"PUT",
          },
          success: function(result){
            // turn button into default state
            iterview.handleButtonLoading(false, '#editBtn');

            if(result.errors)
            {
              $('#edit-form').find('#edit-label-error').html(result.errors.label[0]);
            }
            else
            {
              iterview.handleSuccessResponse(table, result, '#edit-modal');
            }
          }});

      });

    });
  }

  function handleQuestionsAdd() {
    // ADD Question
    $('.add').on('click', function() {
        $('#add-type').get(0).selectedIndex = 0;
        $('#add-topic-1').get(0).selectedIndex = 0;
        $('#question-type').modal('show')
        $('#step_1').on('click',function(){
        // adding this line to keep scroll bar in the second modal
        $(document).on('hidden.bs.modal', '.modal', function () {
        $('.modal:visible').length && $(document.body).addClass('modal-open');
        });
        $('#question-type').modal('hide');
        if($('#add-type').val()==1){
            $('#add-form-1').attr('action','{{url("/questions")}}');

            $( '#add-question-error-1' ).html( "" );
            // clear inputs
            $('#add-question-1').val('');
            myCodeMirror.setValue("");
            myCodeMirror.refresh();
            $("#answers input[type=text]").each(function() {
                    this.value='';
                });
            $("#answers input[type=checkbox]").each(function() {
                    this.checked=false;
                });


            
            // show the modal
            $('#add-modal-1').modal('show'); 

            $('#add-form-1').unbind('submit').submit(function(e){
                // turn button into loading state
                iterview.handleButtonLoading(true, '#addBtn');
                var dataAnswer= [];
                var correctAnswer= [];
                const urlForm= $(this).attr('action');
                e.preventDefault();

                // Get all asnwers
                $("#answers input[type=text]").each(function() {
                    dataAnswer.push(this.value);
                });
                // get index of the correct answers
                var checkedList=[];
                $("input[name='answer']").each(function (i) { 
                        // Push the value onto the array
                        if($(this)[0].checked){
                          checkedList.push(i);
                        }
                });
                // add the correct answer in correcAnswer Array
                dataAnswer.forEach(function(value,index){
                  checkedList.forEach(function(val,ind){
                    if(index==val){
                      correctAnswer.push(value);
                    }
                  });
                });
               // get the wrong answer by remove the correct answer from the dataAnswer Array
                checkedList.slice().reverse().forEach(function(value,index){
                      dataAnswer.splice(value,1);
                });
                $('#add-question-error-1').html( "" );
                $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: urlForm,
                method: 'POST',
                data: {
                    content: $('#add-question-1').val(),
                    topic: $('#add-topic-1').val(),
                    section: $('#add-section-1').val(),
                    type:1,
                    correct_answers:correctAnswer,
                    wrong_answers:dataAnswer,
                    code:$('#code-1').val(),

                },
                success: function(result){
                    // turn button into default state
                    iterview.handleButtonLoading(false, '#addBtn');
                    if(result.errors)
                    {
                      if(result.errors.content && result.errors.correct_answers){
                        $( '#add-answer-error-1' ).html( "" );
                        $('#add-form-1').find('#add-question-error-1').html(result.errors.content[0]);
                      }else if(result.errors.correct_answers){
                         $( '#add-question-error-1' ).html( "" );
                         $('#add-form-1').find('#add-answer-error-1').html(result.errors.correct_answers[0]);
                       }else{
                         $( '#add-answer-error-1' ).html( "" );
                         $('#add-form-1').find('#add-question-error-1').html(result.errors.content[0]);
                       }
                    }
                    else{
                        iterview.handleSuccessResponse(table, result, '#add-modal-1');
                    }
                }});

            });
          }else if($('#add-type').val()==2){
            $('#add-form-2').attr('action','{{url("/questions")}}');

            $( '#add-question-error-2' ).html( "" );
            // clear inputs
            $('#add-question-2').val('');
            $("#answers-2 input[type=text]").each(function() {
                    this.value='';
                });
            $("#answers-2 input[type=checkbox]").each(function() {
                    this.checked=false;
                });


            
            // show the modal
            $('#add-modal-2').modal('show');

            $('#add-form-2').unbind('submit').submit(function(e){
                // turn button into loading state
                iterview.handleButtonLoading(true, '#addBtn-2');
                var dataAnswer= [];
                var correctAnswer= [];
                const urlForm= $(this).attr('action');
                e.preventDefault();

                // Get all asnwers
                $("#answers-2 input[type=text]").each(function() {
                    dataAnswer.push(this.value);
                });
                // get index of the correct answers
                var checkedList=[];
                $("input[name='answer-2']").each(function (i) { 
                        // Push the value onto the array
                        if($(this)[0].checked){
                          checkedList.push(i);
                        }
                });
                // add the correct answer in correcAnswer Array
                dataAnswer.forEach(function(value,index){
                  checkedList.forEach(function(val,ind){
                    if(index==val){
                      correctAnswer.push(value);
                    }
                  });
                });
               // get the wrong answer by remove the correct answer from the dataAnswer Array
                checkedList.slice().reverse().forEach(function(value,index){
                      dataAnswer.splice(value,1);
                });
                $('#add-question-error-2').html( "" );

                var content = $('#add-question-2').val();
                var image = $('#add-image')[0].files[0];
                var topic = $('#add-topic-1').val();
                var section = $('#add-section-1').val();
                var form = new FormData();
                form.append('content', content);
                form.append('image', image);
                form.append('topic', topic);
                form.append('section', section);
                form.append('type',2);
                form.append('correct_answers',JSON.stringify(correctAnswer));
                form.append('wrong_answers',JSON.stringify(dataAnswer));
                console.log(2);
                $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: urlForm,
                method: 'POST',
                data: form,
                contentType: false,
                processData: false,
                success: function(result){
                    // turn button into default state
                    iterview.handleButtonLoading(false, '#addBtn-2');
                    if(result.errors)
                    {
                      if(result.errors.content && result.errors.correct_answers){
                        $( '#add-answer-error-2' ).html( "" );
                        $('#add-form-2').find('#add-question-error-2').html(result.errors.content[0]);
                      }else if(result.errors.correct_answers){
                         $( '#add-question-error-1' ).html( "" );
                         $('#add-form-21').find('#add-answer-error-2').html(result.errors.correct_answers[0]);
                       }else{
                         $( '#add-answer-error-1' ).html( "" );
                         $('#add-form-2').find('#add-question-error-2').html(result.errors.content[0]);
                       }
                    }
                    else{
                        iterview.handleSuccessResponse(table, result, '#add-modal-1');
                    }
                }});

            });
          }else{
            $('#add-form-3').attr('action','{{url("/questions")}}');

            $( '#add-question-error-3' ).html( "" );
            // clear inputs
            $('#add-question-3').val('');
            $("#answer-3").value="";
            codeMirror.setValue("");
            codeMirror.refresh();
            // show the modal
            $('#add-modal-3').modal('show'); 

            $('#add-form-3').unbind('submit').submit(function(e){
                // turn button into loading state
                iterview.handleButtonLoading(true, '#addBtn-3');
                const urlForm= $(this).attr('action');
                e.preventDefault();
                $('#add-question-error-3').html( "" );
                $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: urlForm,
                method: 'POST',
                data: {
                    content: $('#add-question-3').val(),
                    topic: $('#add-topic-1').val(),
                    section: $('#add-section-1').val(),
                    type:3,
                    correct_answer:$("#answer-3").val(),
                    code:$("#code-3").val(),
                },
                success: function(result){
                    // turn button into default state
                    iterview.handleButtonLoading(false, '#addBtn-3');
                    if(result.errors)
                    {
                      if(result.errors.content && result.errors.correct_answers){
                        $( '#add-answer-error-3' ).html( "" );
                        $('#add-form-3').find('#add-question-error-3').html(result.errors.content[0]);
                      }else if(result.errors.correct_answer){
                         $( '#add-question-error-3' ).html( "" );
                         $('#add-form-3').find('#add-answer-error-3').html(result.errors.correct_answer[0]);
                       }else{
                         $( '#add-answer-error-3' ).html( "" );
                         $('#add-form-3').find('#add-question-error-3').html(result.errors.content[0]);
                       }
                    }
                    else{
                        iterview.handleSuccessResponse(table, result, '#add-modal-3');
                    }
                }});

            });
            

          }
        })
    });
    $('select[name="add-topic-1"]').on('change', function(){
        var topicId = $(this).val();
        if(topicId) {
            $.ajax({
                url: '/sections/get/'+topicId,
                type:"GET",
                dataType:"json",
                success:function(data) {

                    $('select[name="add-section-1"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="add-section-1"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
            });
        } else {
            $('select[name="add-section-1"]').empty();
        }

    });
  }
    
});
function get(name){
   if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
}
</script>

@endsection