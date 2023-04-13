@extends('layouts.app')

@section('content')


<div>
  <form method="POST" action="{{route('doExport')}}">
    @csrf
    <input id="export" type="submit" value="Exporter">
</form>
</div>

<div class="A4">
  <h2 class="centre">L1</h2>
  <table class="tables-edt">
    <tr>
      <th></th>
      <th class="fixer">7:30-9:00</th>
      <th class="fixer">9:00-10:30</th>
      <th class="fixer">10:30-12:00</th>
      <th class="fixer">13:30-15:00</th>
      <th class="fixer">15:00-16:30</th>
      <th class="fixer">16:30-18:00</th>
    </tr>

    @for ($i = 0; $i < 6; $i++)
      <tr class="fix-height">
        <td>{{($i === 0) ? 'Lundi' : (($i === 1) ? 'Mardi' : (($i === 2) ? 'Mercredi' : (($i === 3) ? 'Jeudi' : (($i === 4) ? 'Vendredi' : (($i === 5) ? 'Samedi' : (($i === 6) ? 'Dimanche' : ''))))))}}</td>
        <td class="width-edt">
          <div>
            <ul>
              @if ($L1)
                @if ($L1[$i]->count() > 0)
                  @foreach ($L1[$i] as $licence1)
                    @if ($licence1->start == "07:30:00")
                      <li class="inline_block">
                        <ul>
                          <li>{{$licence1->niveau . ' ' . $licence1->design}} </li>
                          <li>{{$licence1->cours}}</li>
                          <li>{{(isset($licence1->professeur->prenoms) && !empty($licence1->professeur->prenoms)) ? (count(explode(' ', $licence1->professeur->prenoms)) > 1 ? explode(' ', $licence1->professeur->prenoms)[1] : explode(' ', $licence1->professeur->prenoms)[0]) : $licence1->professeur->nom}}</li>
                          <li>{{$licence1->salle->design}}</li>
                        </ul>
                      </li>
                    @endif
                  @endforeach
                @endif
              @endif
            </ul>
          </div>
        </td>
        
        <td class="width-edt">
          <div>
            <ul>
              @if ($L1)
                @if ($L1[$i]->count() > 0)
                  @foreach ($L1[$i] as $licence1)
                    @if ($licence1->start == "09:00:00")
                      <li class="inline_block">
                        <ul>
                          <li>{{$licence1->niveau . ' ' . $licence1->design}} </li>
                          <li>{{$licence1->cours}}</li>
                          <li>{{(isset($licence1->professeur->prenoms) && !empty($licence1->professeur->prenoms)) ? (count(explode(' ', $licence1->professeur->prenoms)) > 1 ? explode(' ', $licence1->professeur->prenoms)[1] : explode(' ', $licence1->professeur->prenoms)[0]) : $licence1->professeur->nom}}</li>
                          <li>{{$licence1->salle->design}}</li>
                        </ul>
                      </li>
                    @endif
                  @endforeach
                @endif
              @endif
            </ul>
          </div>
        </td>

        <td class="width-edt">
          <div>
            <ul>
              @if ($L1)
                @if ($L1[$i]->count() > 0)
                  @foreach ($L1[$i] as $licence1)
                    @if ($licence1->start == "10:30:00")
                      <li class="inline_block">
                        <ul>
                          <li>{{$licence1->niveau . ' ' . $licence1->design}} </li>
                          <li>{{$licence1->cours}}</li>
                          <li>{{(isset($licence1->professeur->prenoms) && !empty($licence1->professeur->prenoms)) ? (count(explode(' ', $licence1->professeur->prenoms)) > 1 ? explode(' ', $licence1->professeur->prenoms)[1] : explode(' ', $licence1->professeur->prenoms)[0]) : $licence1->professeur->nom}}</li>
                          <li>{{$licence1->salle->design}}</li>
                        </ul>
                      </li>
                    @endif
                  @endforeach
                @endif
              @endif
            </ul>
          </div>
        </td>

        <td class="width-edt">
          <div>
            <ul>
              @if ($L1)
                @if ($L1[$i]->count() > 0)
                  @foreach ($L1[$i] as $licence1)
                    @if ($licence1->start == "13:30:00")
                      <li class="inline_block">
                        <ul>
                          <li>{{$licence1->niveau . ' ' . $licence1->design}} </li>
                          <li>{{$licence1->cours}}</li>
                          <li>{{(isset($licence1->professeur->prenoms) && !empty($licence1->professeur->prenoms)) ? (count(explode(' ', $licence1->professeur->prenoms)) > 1 ? explode(' ', $licence1->professeur->prenoms)[1] : explode(' ', $licence1->professeur->prenoms)[0]) : $licence1->professeur->nom}}</li>
                          <li>{{$licence1->salle->design}}</li>
                        </ul>
                      </li>
                    @endif
                  @endforeach
                @endif
              @endif
            </ul>
          </div>
        </td>

        <td class="width-edt">
          <div>
            <ul>
              @if ($L1)
                @if ($L1[$i]->count() > 0)
                  @foreach ($L1[$i] as $licence1)
                    @if ($licence1->start == "15:00:00")
                      <li class="inline_block">
                        <ul>
                          <li>{{$licence1->niveau . ' ' . $licence1->design}} </li>
                          <li>{{$licence1->cours}}</li>
                          <li>{{(isset($licence1->professeur->prenoms) && !empty($licence1->professeur->prenoms)) ? (count(explode(' ', $licence1->professeur->prenoms)) > 1 ? explode(' ', $licence1->professeur->prenoms)[1] : explode(' ', $licence1->professeur->prenoms)[0]) : $licence1->professeur->nom}}</li>
                          <li>{{$licence1->salle->design}}</li>
                        </ul>
                      </li>
                    @endif
                  @endforeach
                @endif
              @endif
            </ul>
          </div>
        </td>
        
        <td class="width-edt">
          <div>
            <ul>
              @if ($L1)
                @if ($L1[$i]->count() > 0)
                  @foreach ($L1[$i] as $licence1)
                    @if ($licence1->start == "16:30:00")
                      <li class="inline_block">
                        <ul>
                          <li>{{$licence1->niveau . ' ' . $licence1->design}} </li>
                          <li>{{$licence1->cours}}</li>
                          <li>{{(isset($licence1->professeur->prenoms) && !empty($licence1->professeur->prenoms)) ? (count(explode(' ', $licence1->professeur->prenoms)) > 1 ? explode(' ', $licence1->professeur->prenoms)[1] : explode(' ', $licence1->professeur->prenoms)[0]) : $licence1->professeur->nom}}</li>
                          <li>{{$licence1->salle->design}}</li>
                        </ul>
                      </li>
                    @endif
                  @endforeach
                @endif
              @endif
            </ul>
          </div>
        </td>
        
    </tr>
    @endfor

  </table>
  
</div>

@endsection
