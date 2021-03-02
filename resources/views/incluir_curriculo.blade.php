@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default enviar-curriculo">
                    <div class="panel-heading">Enviar Currículo</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/incluir_curriculo') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nome</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>Este campo é obrigatório</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>Este campo é obrigatório</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Telefone</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>Este campo é obrigatório</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('desired_job') ? ' has-error' : '' }}">
                                    <label for="desired_job" class="col-md-4 control-label">Cargo Desejado</label>

                                    <div class="col-md-6">
                                        <input id="desired_job" type="text" class="form-control" name="desired_job" value="{{ old('desired_job') }}">

                                        @if ($errors->has('desired_job'))
                                            <span class="help-block">
                                                <strong>Este campo é obrigatório</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                                    <label for="education" class="col-md-4 control-label">Escolaridade</label>

                                    <div class="col-md-6">
                                        <select id="education" name="education" class="form-control">
                                            <option value="primeiro incompleto" {{ old('education') == 'primeiro incompleto' ? 'selected' : '' }}>1&deg; Grau Incompleto</option>
                                            <option value="primeiro completo" {{ old('education') == 'primeiro completo' ? 'selected' : '' }}>1&deg; Grau Completo</option>
                                            <option value="segundo incompleto" {{ old('education') == 'segundo incompleto' ? 'selected' : '' }}>2&deg; Grau Incompleto</option>
                                            <option value="segundo completo" {{ old('education') == 'segundo completo' ? 'selected' : '' }}>2&deg; Grau Completo</option>
                                            <option value="superior incompleto" {{ old('education') == 'superior incompleto' ? 'selected' : '' }}>Superior Incompleto</option>
                                            <option value="superior completo" {{ old('education') == 'superior completo' ? 'selected' : '' }}>Superior Completo</option>
                                            <option value="pos incompleto" {{ old('education') == 'pos incompleto' ? 'selected' : '' }}>Pós Graduação Incompleto</option>
                                            <option value="pos completo" {{ old('education') == 'pos completo' ? 'selected' : '' }}>Pós Graduação Completo</option>
                                            <option value="mestrado incompleto" {{ old('education') == 'mestrado incompleto' ? 'selected' : '' }}>Mestrado Incompleto</option>
                                            <option value="mestrado completo" {{ old('education') == 'mestrado completo' ? 'selected' : '' }}>Mestrado Completo</option>
                                            <option value="doutorado incompleto" {{ old('education') == 'doutorado incompleto' ? 'selected' : '' }}>Doutorado Incompleto</option>
                                            <option value="doutorado completo" {{ old('education') == 'doutorado completo' ? 'selected' : '' }}>Doutorado Completo</option>
                                            <option value="pos doutorado incompleto" {{ old('education') == 'pos doutorado incompleto' ? 'selected' : '' }}>Pós Doutorado Incompleto</option>
                                            <option value="pos doutorado completo" {{ old('education') == 'pos doutorado completo' ? 'selected' : '' }}>Pós Doutorado Completo</option>

                                        </select>
                                      
                                        @if ($errors->has('education'))
                                            <span class="help-block">
                                                <strong>Este campo é obrigatório</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="comments" class="col-md-4 control-label">Observações</label>

                                    <div class="col-md-6">
                                    <textarea  cols="54" name="comments" id="comments">

                                    </textarea>
                                    </div>

                                </div>

                                <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                    <label for="filename" class="col-md-4 control-label">Arquivo</label>

                                    <div class="col-md-6">

                                    <input type="file" name="filename" value="{{ old('filename') }}">

                                        @if ($errors->has('filename'))
                                            <span class="help-block">
                                                <strong>{{ __($errors->first('filename')) }} </strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <p><strong>Obs:</strong> O tamanho máximo do arquivo é de 1MB e só são aceitos arquivos do tipo doc, docx ou pdf.</p>


                        </div>
			        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                     Enviar
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    @if(isset($success))    
                        <div class="alert alert-success">
                        {{ $success }}
                        </div>
                    @endif    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
