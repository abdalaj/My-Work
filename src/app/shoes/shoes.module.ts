import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ShoesRoutingModule } from './shoes-routing.module';
import { HomeshoesComponent } from './homeshoes/homeshoes.component';
import { AboutshoesComponent } from './aboutshoes/aboutshoes.component';
import {HttpClient, HttpClientModule} from '@angular/common/http';
import { NgxPaginationModule } from 'ngx-pagination';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';


@NgModule({
  declarations: [
    HomeshoesComponent,
    AboutshoesComponent,
  ],
  imports: [
    CommonModule,
    ShoesRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxPaginationModule,
    NgxSkeletonLoaderModule,
    Ng2SearchPipeModule,
  ]
})
export class ShoesModule { }
