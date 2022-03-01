import { HttpClient } from '@angular/common/http';
import { Component, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-homeshoes',
  templateUrl: './homeshoes.component.html',
  styleUrls: ['./homeshoes.component.css']
})
export class HomeshoesComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;
  Total:any;
  page:number = 1;
  loader:boolean = true;
  totalcount:number = 42;
  filterTerm: string;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/shoes").subscribe({
      next:(item)=>{
        this.data = item;
      },
      complete:()=>{
        this.loader=false;
      }

    });

  }

}
