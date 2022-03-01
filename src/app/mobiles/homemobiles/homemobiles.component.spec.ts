import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomemobilesComponent } from './homemobiles.component';

describe('HomemobilesComponent', () => {
  let component: HomemobilesComponent;
  let fixture: ComponentFixture<HomemobilesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomemobilesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomemobilesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
