import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomefoodsComponent } from './homefoods.component';

describe('HomefoodsComponent', () => {
  let component: HomefoodsComponent;
  let fixture: ComponentFixture<HomefoodsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomefoodsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomefoodsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
