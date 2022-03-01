@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')



<div class="mdl-grid mdl-grid--no-spacing dashboard">
    <div class="mdl-grid mdl-grid--no-spacing dashboard">
        <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp weather">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Now</h2>

                        <div class="mdl-layout-spacer"></div>
                        <div class="mdl-card__subtitle-text">
                            <i class="material-icons">room</i>
                           Cairo Egypt
                        </div>
                    </div>
                    <div class="mdl-card__supporting-text mdl-card--expand">
                        <p class="weather-temperature"><sup>&deg;</sup></p>

                        <p class="weather-description" >

                        </p>
                    </div>
                </div>
            </div>
            <!-- Trending widget-->
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp trending">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Many Of Items</h2>
                    </div>
                    <div class="mdl-card__supporting-text" style="height: 285px;overflow: auto">
                        <ul class="mdl-list">
                            <li class="mdl-list__item ">
                                <span class="mdl-list__item-primary-content list__item-text">اعداد التجار</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text ">اعداد الاوردر</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $order }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text">اعداد الاكسسورات</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data1 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text">اعداد مستحضرات التجميل والعطور</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data2 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text ">اعداد الكمبيوترات</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data7 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text">اعداد الالكترونيات</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data6 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content">اعداد الملابس</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data8 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content">اعداد الاحذيه</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data9 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content">اعداد الموبايلات</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data10 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content">اعداد الكتب</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data4 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content">اعداد الالعاب</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data3 }}</span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content">اعداد الاطعمه والسوبر ماركت</span>
                                <span class="mdl-list__item-secondary-content">
                                    <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent">{{ $data5 }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

              <!-- Trending widget-->
              <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp trending">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Many Of Items</h2>
                    </div>
                    <div class="mdl-card__supporting-text" style="height: 285px;overflow: auto">
                        <style>
                            .mdl-card__supporting-text *{
                                direction: rtl;
                                text-align: right
                            }
                        </style>
                        <ul class="mdl-list">

                            <li class="mdl-list__item ">
                                <span class="mdl-list__item-primary-content list__item-text">الدولار</span>
                                <span class="mdl-list__item-secondary-content">
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent dollar"></span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text">الدولار</span>
                                <span class="mdl-list__item-secondary-content">
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent aed eur"></span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text">الدولار</span>
                                <span class="mdl-list__item-secondary-content">
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent cny"></span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text ">الدولار</span>
                                <span class="mdl-list__item-secondary-content">
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent GBP"></span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text">الدولار</span>
                                <span class="mdl-list__item-secondary-content">
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent egp"></span>
                            </li>
                            <li class="mdl-list__item list__item--border-top">
                                <span class="mdl-list__item-primary-content list__item-text">الدولار</span>
                                <span class="mdl-list__item-secondary-content">
                                </span>
                                <span class="mdl-list__item-secondary-content trending__percent kwd"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Cotoneaster card-->
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp cotoneaster">
                    <div class="mdl-card__title mdl-card--expand">
                        <h2 class="mdl-card__title-text">Cotoneaster</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div>
                            Cotoneaster is a genus of flowering plants in the rose family, Roseaceae, netive to the
                            Palaearctic region, with a strong concentration of diversity in the genus in the
                            mountains
                            of southwestern China and the Himalayas.
                        </div>
                        <a href="https://en.wikipedia.org/wiki/Cotoneaster" target="_blank">Wikipedia</a>
                    </div>
                </div>
            </div>
            <!-- Line chart-->
            <div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp line-chart">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Startup Financing Cycle</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="line-chart__container">

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
