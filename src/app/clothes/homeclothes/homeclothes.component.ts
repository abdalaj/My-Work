import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-homeclothes',
  templateUrl: './homeclothes.component.html',
  styleUrls: ['./homeclothes.component.css']
})
export class HomeclothesComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;  Total:any;
  page:number = 1;
  loader:boolean = true;
  totalcount:number = 42;
  filterTerm:string
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/clothes").subscribe({
      next:(item)=>{this.data=item},
      complete:()=>{
        this.loader=false;
      }

    })
  }

}
