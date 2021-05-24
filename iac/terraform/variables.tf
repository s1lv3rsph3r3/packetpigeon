locals {
  deploying_env = {
    blue = {
      blue = {
        server_up = {
          server = true
          dns = false
        }
        dns_up = {
          server = true
          dns = true
        }
        dns_down = {
          server = true
          dns = true
        }
        server_down = {
          server = true
          dns = true
        }
      }
      green = {
        server_up = {
          server = true
          dns = true
        }
        dns_up = {
          server = true
          dns = true
        }
        dns_down = {
          server = true
          dns = false
        }
        server_down = {
          server = false
          dns = false
        }
      }
    }
    green = {
      blue = {
        server_up = {
          server = true
          dns = true
        }
        dns_up = {
          server = true
          dns = true
        }
        dns_down = {
          server = true
          dns = false
        }
        server_down = {
          server = false
          dns = false
        }
      }
      green = {
        server_up = {
          server = true
          dns = false
        }
        dns_up = {
          server = true
          dns = true
        }
        dns_down = {
          server = true
          dns = true
        }
        server_down = {
          server = true
          dns = true
        }
      }
    }
  }
}

variable "deployment_environment" {
  description = "The colour of the deployment environment"
  type        = string
}

variable "deployment_stage" {
  description = "State at which the blue green deployment"
  type = string
}
