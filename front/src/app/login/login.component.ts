import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Client } from '../models/client';
import { ApiService } from '../api.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private apiService : ApiService) { }

  client$: Observable<Client>;

  ngOnInit(): void {
  }

  onSubmit(f: NgForm) {
    if(f.valid) {
      this.client$ = this.apiService.login(f.value.login, f.value.password);
    }
  }
}
