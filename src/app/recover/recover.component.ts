import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-recover',
  templateUrl: './recover.component.html',
  styleUrls: ['./recover.component.sass']
})
export class RecoverComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/recover").subscribe({
      next:(item)=>{
        this.data=item;
        console.log(this.data)
      }
    });
  }

}
