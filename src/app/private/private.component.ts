import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-private',
  templateUrl: './private.component.html',
  styleUrls: ['./private.component.sass']
})
export class PrivateComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/privat").subscribe({
      next:(item)=>{
        this.data=item;
        console.log(this.data)
      }
    });
  }

}
