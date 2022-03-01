import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.sass']
})
export class SearchComponent implements OnInit {

  constructor() {

   }

  ngOnInit(): void {
    const search = document.getElementById('search');
    const found = document.getElementById('found');
    const searchStates  = async searchText=>{
        const types = document.querySelector('#types')['value'];
        var res;
        if (types == 'ac') {
          res = await fetch('https://dash.faster-eg.com/api/accessories');
        }else if (types == 'bu') {
          res = await fetch('https://dash.faster-eg.com/api/beauty');
        }else if (types == 'el') {
          res = await fetch('https://dash.faster-eg.com/api/electronics');
        }else if (types == 'co') {
          res = await fetch('https://dash.faster-eg.com/api/computers');
        }else if (types == 'to') {
          res = await fetch('https://dash.faster-eg.com/api/toys');
        }else if (types == 'fo') {
          res = await fetch('https://dash.faster-eg.com/api/foods');
        }else if (types == 'mo') {
          res = await fetch('https://dash.faster-eg.com/api/mobiles');
        }else if (types == 'ca') {
          res = await fetch('https://dash.faster-eg.com/api/car');
        }else if (types == 'sh') {
          res = await fetch('https://dash.faster-eg.com/api/shoes');
        }else if (types == 'cl') {
          res = await fetch('https://dash.faster-eg.com/api/clothes');
        }
        else if (types == 'bo') {
          res = await fetch('https://dash.faster-eg.com/api/books');
        }
        const states = await res.json();

        let matches = states.filter(state => {
           const regex = new RegExp(`^${searchText}`,'gi');
           return state.name.match(regex) || state.describ.match(regex) || state.summry.match(regex) || state.price.match(regex) || state.saler.match(regex) || state.stauts.match(regex) || state.address.match(regex);
        });
        if (searchText.length === 0) {
            matches=[];
            found.style.display = 'none';
        }
        outputHtml(matches);
    };

    const outputHtml = matches=>{
        if (matches.length>0) {
          found.style.display = 'block';
          found.style.backgroundColor='white';
          found.style.width='89%';
          found.style.height='420px';
          found.style.padding='20px 40px';
          found.style.position='absolute';
          found.style.top='118px';
          found.style.zIndex='999999999999999';
          found.style.overflowY='auto';
          const types = document.querySelector('#types')['value'];
          if (types == 'ac') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/accessories/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'bu') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/beauty/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'el') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/electronics/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'co') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/computers/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'to') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/toys/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'fo') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/foods/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'mo') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/mobiles/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'ca') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/car/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'sh') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/shoes/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
            `).join('');
            found.innerHTML = html;
          }else if (types == 'cl') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/clothes/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
       `).join('');
       found.innerHTML = html;          }
          else if (types == 'bo') {
            const html = matches.map(match=>`
            <ul style="list-style: none;text-align:right !important">
              <li style="margin-bottom: 20px;">
                <a href="/books/item/${match.id}/${match.describ}/${match.price}/${match.user_item_id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
              </li>
            </ul>
       `).join('');
       found.innerHTML = html;          }

        }else{
          found.innerHTML = '<div id="not" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);font-size:25px;font-weight:bold">ما تبحث عنه غير موجود للاسف <span id="x" style="color:red"> X</span></div>';
            document.getElementById('x').addEventListener('click',function(){
                document.getElementById('not').style.display = 'none';
                found.style.display = 'none'
                search['value'] = '';
            });
        }
    }

    search.addEventListener('input',() => searchStates(search['value']));
  }

}

