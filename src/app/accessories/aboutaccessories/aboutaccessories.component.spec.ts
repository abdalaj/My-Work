import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutaccessoriesComponent } from './aboutaccessories.component';

describe('AboutaccessoriesComponent', () => {
  let component: AboutaccessoriesComponent;
  let fixture: ComponentFixture<AboutaccessoriesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutaccessoriesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutaccessoriesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
