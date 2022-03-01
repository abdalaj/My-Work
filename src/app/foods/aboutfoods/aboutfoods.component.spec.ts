import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutfoodsComponent } from './aboutfoods.component';

describe('AboutfoodsComponent', () => {
  let component: AboutfoodsComponent;
  let fixture: ComponentFixture<AboutfoodsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutfoodsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutfoodsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
