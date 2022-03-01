import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomecarsComponent } from './homecars.component';

describe('HomecarsComponent', () => {
  let component: HomecarsComponent;
  let fixture: ComponentFixture<HomecarsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomecarsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomecarsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
