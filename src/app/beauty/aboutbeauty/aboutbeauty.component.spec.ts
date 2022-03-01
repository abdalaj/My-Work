import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutbeautyComponent } from './aboutbeauty.component';

describe('AboutbeautyComponent', () => {
  let component: AboutbeautyComponent;
  let fixture: ComponentFixture<AboutbeautyComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutbeautyComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutbeautyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
