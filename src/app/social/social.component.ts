import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-social',
  templateUrl: './social.component.html',
  styleUrls: ['./social.component.sass']
})
export class SocialComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/social").subscribe({
      next:(item)=>{
        this.data=item;
        console.log(this.data)
      }
    });
  }

}
