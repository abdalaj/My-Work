import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-homebooks',
  templateUrl:'./homebooks.component.html',
  styleUrls: ['./homebooks.component.css']
})
export class HomebooksComponent implements OnInit {
  constructor(private htp:HttpClient) { }
  data;  Total:any;
  page:number = 1;
  loader:boolean = true;
  totalcount:number = 42;
  filterTerm:string;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/books").subscribe({
      next:(item)=>{this.data=item},
      complete:()=>{
        this.loader=false;
      }
    });


  }

}
