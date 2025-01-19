<div style="width: 100%;" class="accordion" id="accordionExample{{$item['id']}}">
    <div class="accordion-item">
        <h2 class="accordion-header" id="{{$item['id']}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item['id']}}" aria-expanded="false" aria-controls="collapse{{$item['id']}}">
                {{$item['name']}}
            </button>
        </h2>
        <div id="collapse{{$item['id']}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample{{$item['id']}}">
            <div class="accordion-body">
                {!! $child !!}
            </div>
        </div>
    </div>
</div>
