import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MobilesRoutingModule } from './mobiles-routing.module';
import { HomemobilesComponent } from './homemobiles/homemobiles.component';
import { AboutmobilesComponent } from './aboutmobiles/aboutmobiles.component';
import { HttpClientModule } from '@angular/common/http';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';
import { NgxPaginationModule } from 'ngx-pagination';


@NgModule({
  declarations: [
    HomemobilesComponent,
    AboutmobilesComponent
  ],
  imports: [
    CommonModule,
    MobilesRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxSkeletonLoaderModule,
    NgxPaginationModule,
    Ng2SearchPipeModule
  ]
})
export class MobilesModule { }
