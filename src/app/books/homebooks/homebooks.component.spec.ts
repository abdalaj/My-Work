import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomebooksComponent } from './homebooks.component';

describe('HomebooksComponent', () => {
  let component: HomebooksComponent;
  let fixture: ComponentFixture<HomebooksComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomebooksComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomebooksComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
