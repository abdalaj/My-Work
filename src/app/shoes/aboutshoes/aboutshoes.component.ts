import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-aboutshoes',
  templateUrl: './aboutshoes.component.html',
  styleUrls: ['./aboutshoes.component.sass']
})
export class AboutshoesComponent implements OnInit {

  constructor(private htp:HttpClient,private actor:ActivatedRoute) { }
  onedata;
  loader:boolean = true;
  data;
  ngOnInit(): void {
    this.id = parseInt(this.actor.snapshot.paramMap.get('id'));
    this.htp.get("https://dash.faster-eg.com/api/shoes/"+this.id).subscribe({
      next:(item)=>{
        setTimeout(() => {
          this.loader=false;
        }, 1250);
        this.onedata=item;
      },
    });
  }
  id = parseInt(this.actor.snapshot.paramMap.get('id'));
  describ = this.actor.snapshot.paramMap.get('describ');
  price = this.actor.snapshot.paramMap.get('price');
  user_item_id = this.actor.snapshot.paramMap.get('user_item_id');
  order={
    id:0,
    name:null,
    many:null,
    phone:null,
    city:null,
    carya:null,
    describ:this.describ,
    details:null,
    price:this.price,
    user_item_id:this.user_item_id,
    created_at:0,
    updated_at:0
  };
  myapp(){
    this.htp.post("https://dash.faster-eg.com/api/orders",this.order).subscribe({
      next:()=>{alert("تم طلب المنتج بنجاح")}
    });
  }

 }
