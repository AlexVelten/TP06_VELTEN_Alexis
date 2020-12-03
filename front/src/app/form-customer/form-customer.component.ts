import { Component, OnInit } from '@angular/core'
import { NgForm } from '@angular/forms';
import { Client } from '../models/client';
import { ApiService } from '../api.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-form-customer',
  templateUrl: './form-customer.component.html',
  styleUrls: ['./form-customer.component.css']
})

export class FormCustomerComponent implements OnInit {

  client: Client = null;
  standard_telephone: string;
  display: boolean;
  obs_client : Observable<Client>;

  constructor(private apiService : ApiService) { }

  ngOnInit(): void {

  }

  onSubmit(f: NgForm) {
    if(f.valid) {
      this.client = new Client(f.value.civilite,f.value.nom, f.value.prenom, f.value.adresse, f.value.ville, this.standard_telephone, f.value.pays, f.value.code_postale, f.value.email, f.value.login, f.value.password);
      this.display = true;
      this.obs_client = this.apiService.addClient(this.client);
    }
  }
}
