<div class="content">
    <table class="table table-striped table-info">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $key => $row)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<button onclick='showThis(this)'>Один</button>
