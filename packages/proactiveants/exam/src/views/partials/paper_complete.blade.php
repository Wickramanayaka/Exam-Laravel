<div class="row">
    <div class="col-md-10 offset-md-1">
        <table class="table">
            <thead>
                <tr>
                    <th>උත්සාහයන්</th><th>තත්ත්වය</th><th>ලකුණු/100</th><th>සමාලෝචනය</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tryouts as $key => $tryout)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>සම්පූර්ණ කළා, {{$tryout->end_at}}</td>
                        <td>
                            {{$tryout->userAnswers->sum('mark')}}
                        </td>
                        <td>
                            <button onclick="review({{$tryout->id}})" class="btn btn-link">සමාලෝචනය</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>