import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutclothesComponent } from './aboutclothes.component';

describe('AboutclothesComponent', () => {
  let component: AboutclothesComponent;
  let fixture: ComponentFixture<AboutclothesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutclothesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutclothesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
