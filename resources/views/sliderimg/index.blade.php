@extends('layouts.app')
@section('title')
    sliderimg
@endsection
@section('content')
    <br />
    <br />
    <a  href="/sliderimg/create" style="margin-left:20px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" data-upgraded=",MaterialButton,MaterialRipple">
        <i class="material-icons">add_circle</i>
        Create New Item
        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
    </a>
    <br />
    <br />
    <div class="mdl-grid ui-tables">
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">All Items Of Me</h1>
                </div>
                <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bItemsed-table">
                        <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">Id</th>
                                <th class="mdl-data-table__cell--non-numeric">Img1</th>
                                <th class="mdl-data-table__cell--non-numeric">Img2</th>
                                <th class="mdl-data-table__cell--non-numeric">Img3</th>
                                <th class="mdl-data-table__cell--non-numeric">Img4</th>
                                <th class="mdl-data-table__cell--non-numeric">Img5</th>
                                <th class="mdl-data-table__cell--non-numeric">Img6</th>
                                <th class="mdl-data-table__cell--non-numeric">Img7</th>
                                <th class="mdl-data-table__cell--non-numeric">Img8</th>
                                <th class="mdl-data-table__cell--non-numeric">Img9</th>
                                <th class="mdl-data-table__cell--non-numeric">Img10</th>
                                <th class="mdl-data-table__cell--non-numeric">Details</th>
                                <th class="mdl-data-table__cell--non-numeric delete">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>

                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img1'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img2'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img3'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img4'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img5'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img6'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img7'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img8'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img9'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/sliderimg/{{ $item['img10'] }}" width="50" height="50" />
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <a href="{{ route('sliderimg.show',$item['id']) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" data-upgraded=",MaterialButton,MaterialRipple">
                                        <i class="material-icons">forward</i>
                                        Details
                                        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
                                    </a>
                                </td>

                                <td class="mdl-data-table__cell--non-numeric delete">
                                    <form action="{{ route('sliderimg.destroy',$item['id']) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple" >
                                            <i class="material-icons">delete</i>
                                            Delete
                                            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
