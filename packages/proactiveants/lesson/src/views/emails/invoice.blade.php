@component('mail::message')
Dear {{$subscription->user->first_name}},<br>
Here is your subscription invoice from {{config('app.name')}}.<br>
<hr>
Subscription Date: {{$subscription->date}}<br>
Subscription #: {{$subscription->id}}
@component('mail::table')
| Item                                                                                                               | Qty   | Amount                    |
| ------------------------------------------------------------------------------------------------------------------ | -----:| -------------------------:|
| Videos lessons for {{$subscription->gradeSubject->grade->name}} -  {{$subscription->gradeSubject->subject->name}}  | 1     | {{$subscription->amount}} |    
@endcomponent
@component('mail::table')
|               |                                      |
| -------------:| ------------------------------------:|
| Sub Total:    | {{$subscription->amount}}            |
| Total:        | {{$subscription->amount}}            | 

@endcomponent
<hr>
Thanks,<br>
{{ config('app.name') }}
@endcomponent