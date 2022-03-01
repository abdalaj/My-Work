import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-homecars',
  templateUrl: './homecars.component.html',
  styleUrls: ['./homecars.component.css']
})
export class HomecarsComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;  Total:any;
  page:number = 1;
  loader:boolean = true;
  totalcount:number = 42;
  filterTerm:string
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/car").subscribe({
      next:(item)=>{this.data=item},
      complete:()=>{
        this.loader=false;
      }

    })
  }
}
