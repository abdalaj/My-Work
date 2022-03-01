import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.sass']
})
export class AboutComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/about").subscribe({
      next:(item)=>{
        this.data=item;
        console.log(this.data)
      }
    });
  }

}
