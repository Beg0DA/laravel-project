 
@extends('layouts/main_layout')

@section('content')
    <h1 class="text-center mb-3 display-3" style="color: #1AA7EC;">Создать новый опрос</h1>

    <form method="post" action="{{route('admin.form_create')}}">
        @csrf
        <div class="mb-3">
            <label for="form_name" class="form-label fs-5" style="color: #1AA7EC;">Название опроса:</label>
            <input type="text" class="form-control" id="form_name" name="form_name" required>
          </div>
        
          <label class="form-label fs-5" style="color: #1AA7EC;">Выборы (добавьте больше если требуется):</label>
          <div id="choices-container" class="mb-3">
            <input type="text" class="form-control" name="choices[]" required><br>
            <input type="text" class="form-control" name="choices[]"><br>
          </div>
        
          <button type="button" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-secondary mb-3 mt-2 w-100 shadow-sm  p-1 fs-3 rounded-pill " onclick="addChoice()">Добавить выбор</button> 
          <br><br>
        
        
          <input type="submit" name="submit" value="Создать голосование" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-outline-primary mb-3 mt-2 w-100 shadow-sm  p-1 fs-3 rounded-pill ">
        </form>
        


    <script>
        function addChoice() {
            var container = document.getElementById("choices-container");
            var input = document.createElement("input");
            input.type = "text";
            input.classList.add("form-control");
            input.name = "choices[]";
            container.appendChild(document.createElement("br"));
            container.appendChild(input);
            container.appendChild(document.createElement("br"));

        }
    </script>
@endsection
