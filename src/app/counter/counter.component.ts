import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-counter',
  templateUrl: './counter.component.html',
  styleUrls: ['./counter.component.sass']
})
export class CounterComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;

  ngOnInit(): void {
    this.htp.get("https://api.countapi.xyz/hit/faster-eg/visits").subscribe((res:any)=>{
      this.data=res.value;
    });
  }

}
