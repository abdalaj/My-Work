import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutmobilesComponent } from './aboutmobiles.component';

describe('AboutmobilesComponent', () => {
  let component: AboutmobilesComponent;
  let fixture: ComponentFixture<AboutmobilesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutmobilesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutmobilesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
