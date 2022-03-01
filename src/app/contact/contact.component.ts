import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.sass']
})
export class ContactComponent implements OnInit {

  constructor(private htp:HttpClient) { }

  ngOnInit(): void {
  }
  contact={
    id:0,
    name:null,
    email:null,
    phone:null,
    message:null,
    address:null
  };
  send(){
    this.htp.post("https://dash.faster-eg.com/api/contact",this.contact).subscribe({
      next:()=>{alert("تم ارسال رسالتك بنجاح")}
    });
  }
}
