import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutshoesComponent } from './aboutshoes.component';

describe('AboutshoesComponent', () => {
  let component: AboutshoesComponent;
  let fixture: ComponentFixture<AboutshoesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutshoesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutshoesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
