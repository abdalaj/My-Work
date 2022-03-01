import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.sass']
})
export class HomeComponent implements OnInit {

  constructor(private htp:HttpClient) { }
  data;
  data1;
  data2;
  data3;
  data4;
  data5;
  data6;
  data7;
  data8;
  data9;
  data10;
  loader:boolean = true;
  ngOnInit(): void {
    this.htp.get("https://dash.faster-eg.com/api/imghome").subscribe({
      next:(item)=>{this.data=item},
      complete:()=>{
        setTimeout(() => {
          this.loader=false;
        }, 3000);
      }
    });
    this.htp.get("https://dash.faster-eg.com/api/imghome").subscribe((res:any)=>{
      this.data1=res.img1;
      this.data2=res.img2;
      this.data3=res.img3;
      this.data4=res.img4;
      this.data5=res.img5;
      this.data6=res.img6;
      this.data7=res.img7;
      this.data8=res.img8;
      this.data9=res.img9;
      this.data10=res.img10;
    });
  }

}
