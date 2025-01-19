
    <input type="hidden" id="data">
    <table id="table" class="table table-striped table-info">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col"><button data-sort-row="name" onclick='sort(this)'>Название <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAqUlEQVR4nO2TUQqFIBBF7yaetP+lOB/xHr2fClqOIYwgYmA6E4gdiCJHD9NtgJcRIQCu8PK1Ob4AZk2xvTgjrD+O60pMDdmqi62GWIK+xNSQrZrYaool6EtMjfmKi622WIK+xFSRrY9hAWAyYsNr811xSbY/rt1YFPYafue4RpxYEO7x8xZ9DXE+ANbMNBwAppIDqGJuA76rPem4uFOqmNtU/k9+tpcBOQEWyZL8yn5IGwAAAABJRU5ErkJggg==" alt="generic-sorting"></button></th>
            <th scope="col"><button data-sort-row="price" onclick='sort(this)'>Цена <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAqUlEQVR4nO2TUQqFIBBF7yaetP+lOB/xHr2fClqOIYwgYmA6E4gdiCJHD9NtgJcRIQCu8PK1Ob4AZk2xvTgjrD+O60pMDdmqi62GWIK+xNSQrZrYaool6EtMjfmKi622WIK+xFSRrY9hAWAyYsNr811xSbY/rt1YFPYafue4RpxYEO7x8xZ9DXE+ANbMNBwAppIDqGJuA76rPem4uFOqmNtU/k9+tpcBOQEWyZL8yn5IGwAAAABJRU5ErkJggg==" alt="generic-sorting"></button></th>
        </tr>
        </thead>
        <tbody id="tBody">
        @foreach($rows as $key => $row)
            <tr>
                <th class="num" scope="row">{{$key + 1}}</th>
                <td class="text" >{{$row->name}}</td>
                <td class="price" >{{$row->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

