@component('mail::message')
Dear {{$payment->user->first_name}},<br>
Here is your class payment invoice from {{config('app.name')}}.<br>
<hr>
Peyment Date: {{$payment->date}}<br>
Payment #: {{$payment->id}}
@component('mail::table')
| Item                                                                                  | Qty   | Amount                    |
| ------------------------------------------------------------------------------------- | -----:| -------------------------:|
| Payment for the {{$payment->course->name}} -  {{$payment->course->teacher->name}}     | 1     | {{$payment->amount}}      |    
@endcomponent
@component('mail::table')
|               |                                      |
| -------------:| ------------------------------------:|
| Sub Total:    | {{$payment->amount}}                 |
| Total:        | {{$payment->amount}}                 | 

@endcomponent
<hr>
Thanks,<br>
{{ config('app.name') }}
@endcomponent