import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-aboutelectronics',
  templateUrl: './aboutelectronics.component.html',
  styleUrls: ['./aboutelectronics.component.sass']
})
export class AboutelectronicsComponent implements OnInit {

  constructor(private htp:HttpClient,private actor:ActivatedRoute) { }
  onedata;
  loader:boolean = true;
  ngOnInit(): void {
    this.id = parseInt(this.actor.snapshot.paramMap.get('id'));
    this.htp.get("https://dash.faster-eg.com/api/electronics/"+this.id).subscribe({
      next:(item)=>{setTimeout(() => {
        this.loader=false;
      }, 1250);
      this.onedata=item}
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
    user_item_id:this.user_item_id,
    city:null,
    carya:null,
    describ:this.describ,
    details:null,
    price:this.price,
    created_at:0,
    updated_at:0
  };
  myapp(){
    this.htp.post("https://dash.faster-eg.com/api/orders",this.order).subscribe({
      next:()=>{alert("تم طلب المنتج بنجاح")},
    })
  }

}
