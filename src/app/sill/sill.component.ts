import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-sill',
  templateUrl: './sill.component.html',
  styleUrls: ['./sill.component.sass']
})
export class SillComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/sill").subscribe({
      next:(item)=>{
        this.data=item;
        console.log(this.data)
      }
    });
  }
}
